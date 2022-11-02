class ExpertsFilter {
  constructor(props) {
    this.experts = document.querySelectorAll(props.experts)
    this.wrap = document.querySelector(props.wrap)
    const linkParams = new URLSearchParams(location.search)

    this.addFilterCategories('Usługi', pageState.cats[0])
    this.addFilterCategories('Segmenty rynku', pageState.cats[1])
    this.btns = document.querySelectorAll(props.buttons)
    this.catBtns = document.querySelectorAll(props.catBtns)
    this.resetBtn = document.querySelector(props.reset)

    this.resetBtn.addEventListener('click', () => { this.resetCategory() })

    this.btns.forEach($btn => {
      if ($btn.dataset.srt === linkParams.get('filter')) {
        this.filter($btn.dataset.srt)
      }
      $btn.addEventListener('click', () => { this.filter($btn.dataset.srt) })
    })

    this.catBtns.forEach(($btn, i) => {
      $btn.addEventListener('click', () => {
        if ($btn.classList.contains('open')) {
          return false
        }
        this.catBtns.forEach($subBtn => $subBtn.classList.remove('open'))
        this.changeCategory($btn, i)
      })
    })
  }

  filter(val) {
    let expertCounter = 0
    this.experts.forEach($expert => {
      if (val !== 'wszyscy') {
        this.resetBtn.classList.remove('active')
        let showExpert = false
        $expert.querySelectorAll('[data-srt]').forEach($item => {
          if ($item.dataset.srt === val) {
            showExpert = true
            expertCounter++
          }
        })
        const displayStyle = showExpert ? 'block' : 'none'
        $expert.style.display = displayStyle
      } else {
        $expert.style.display = 'block'
      }
      setTimeout(() => {
        document.querySelector('#expert-boxes-anchor').scrollIntoView({
          behavior: 'smooth'
        });
      }, 200)
    })
    this.btns.forEach($btn => {
      const action = $btn.dataset.srt === val ? 'add' : 'remove'
      if ($btn.dataset.srt === val) {
        $btn.parentNode.style.height = 'auto'
        this.catBtns.forEach(item => item.classList.remove('open', 'active'))
        $btn.parentNode.previousElementSibling.classList.add('open', 'active')
      }
      $btn.classList[action]('active')
    })

    barba.history.add(`?filter=${val}`, 'replace')

    const animationLine = gsap.timeline()
      .to('#error-alert', {
        opacity: expertCounter === 0 ? 1 : 0,
        display: expertCounter === 0 ? 'block' : 'none'
      })
  }

  addFilterCategories(title, items) {
    const catsWrap = document.createElement('div')
    catsWrap.classList.add('experts-filter__btns')
    this.wrap.innerHTML += `<button class="experts-filter__category">${title}</button>`
    items.forEach(item => {
      catsWrap.innerHTML += `
        <button data-srt="${item.slug}" class="experts-filter__btn">${item.title}</button>
      `
    })
    this.wrap.appendChild(catsWrap)
  }

  changeCategory($btn, i) {
    const currentTab = document.querySelectorAll('.experts-filter__btns')[i]

    const animationLine = gsap.timeline()
      .to('.experts-filter__btns', { height: 0, duration: .15 })
      .to(currentTab, { height: 'auto', duration: .15 }, '<')
      .add(() => { $btn.classList.add('open', 'active') }, '<')
    this.filter(currentTab.querySelector('button').dataset.srt)
    this.catBtns.forEach($subBtn => $subBtn.classList.remove('active'))
  }

  resetCategory() {
    const animationLine = gsap.timeline()
      .to('.experts-filter__btns', { height: 0, duration: .15 })
      .add(() => {
        this.resetBtn.classList.add('active')
        this.catBtns.forEach($subBtn => $subBtn.classList.remove('active'))
        this.catBtns.forEach($subBtn => $subBtn.classList.remove('open'))
      })
      .to('#error-alert', { opacity: 0, display: 'none' })
    this.filter('wszyscy')
  }
}
