class PostsSorting {
  constructor(props) {
    this.panel = document.querySelector(props.panel)
    this.showButton = document.querySelector(props.showButton)
    this.wrap = document.querySelector(props.wrap)
    this.sortButtonsClass = props.sortButtons
    this.sortButtons = document.querySelectorAll(this.sortButtonsClass)
    this.sortingAmount = document.querySelector(props.amount)
    this.postsLinks = document.querySelectorAll(props.links)
    this.sortLink = document.querySelector(props.sortingLink)
    this.reset = document.querySelector(props.reset)
    this.sortUrl = this.sortLink.href
    this.searchedPosts = []
    this.currentLink = []
    this.panelShow = false

    this.markCheckedButtons(new URLSearchParams(location.search))
    this.reset.addEventListener('click', () => { this.panelReset(true) })
    this.showButton.addEventListener('click', () => { this.panelToggle() })
    this.sortButtons.forEach($btn => {
      $btn.addEventListener('click', () => { this.changeLink($btn) })
    })
    window.addEventListener('click', (e) => {
      if (!e.target.dataset.sort && this.panelShow) {
        this.panelToggle()
      }
    })
  }

  markCheckedButtons(linkParams) {
    if (!linkParams.get('inne')) {
      const slug = document.querySelector('[data-barba-namespace]')
      this.sortButtons.forEach($btn => {
        if (slug.dataset.barbaNamespace === $btn.dataset.sortUrl) {
          this.changeLink($btn)
        }
      })

      return false
    }
    Array.from(this.sortButtons)
      .filter($btn =>
        linkParams.get('inne').split(' ').includes($btn.dataset.sortUrl))
      .forEach($btn => this.changeLink($btn))
  }

  panelReset(hold = false) {
    this.currentLink = []
    this.searchedPosts = []
    this.sortingAmount.innerHTML = 0
    this.sortButtons.forEach(btn => btn.classList.remove('checked'))
    this.sortLink.href = this.sortUrl
    this.changeLinkState()
    if (!hold) {
      this.wrap.classList.remove('open')
      gsap.timeline().to(this.panel, { opacity: 0, display: 'none', duration: .2 })
      this.panelShow = false
    }
  }

  panelToggle() {
    const cssValues = this.panelShow
      ? { opacity: 0, display: 'none' } : { opacity: 1, display: 'block' }
    this.wrap.classList[this.panelShow ? 'remove' : 'add']('open')
    gsap.timeline().to(this.panel, { ...cssValues, duration: .2 })
    this.panelShow = !this.panelShow
  }

  changeLink(btn) {
    if (this.currentLink.includes(btn.dataset.sortUrl)) {
      this.currentLink = this.currentLink.filter(item => item !== btn.dataset.sortUrl)
      btn.classList.remove('checked')
    } else {
      this.currentLink.push(btn.dataset.sortUrl)
      btn.classList.add('checked')
    }
    this.searchPosts()
    const mainCategory = this.currentLink.length ? this.currentLink[0] : ''
    const addCategories = `?inne=${this.currentLink.join('+')}`
    this.sortLink.href = `${this.sortUrl}/${mainCategory}${addCategories}`
    this.changeLinkState(!mainCategory && addCategories === '?inne=')
  }

  changeLinkState(val = true) {
    const action = val ? 'add' : 'remove'
    this.sortLink.classList[action]('disabled')
  }

  searchPosts() {
    const $checkedButtons = document.querySelectorAll(`${this.sortButtonsClass}.checked`)
    this.searchedPosts = []
    $checkedButtons.forEach($btn => {
      this.postsLinks.forEach($link => {
        const postCategories = $link.dataset.searchCat.split(', ').map(cat => cat.toLowerCase())
        const postFromCategory = postCategories.includes($btn.dataset.sortSearch.toLowerCase())
        const postInSearched = this.searchedPosts.includes($link.dataset.searchName)
        if (postFromCategory && !postInSearched) {
          this.searchedPosts.push($link.dataset.searchName)
        }
      })
    })
    this.sortingAmount.innerHTML = this.searchedPosts.length
  }
}
