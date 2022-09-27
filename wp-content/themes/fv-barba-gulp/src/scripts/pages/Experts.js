const Experts = new Page('experts');

Experts.beforeEnterFunction = () => {
  elt('.site-content').classList.add('site-content--home')
  elt('.header').classList.add('header--post')

  window.addEventListener('scroll', () => {
    if (elt('#experts-up')) {
      elt('#experts-up').classList[window.scrollY > 200 ? 'add' : 'remove']('experts__up--visible')
    }
  })

  elt('#experts-up').addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }))
}

Experts.afterEnterFunction = () => {
  setTimeout(() => {
    elts('.experts__box').forEach(box => {
      box.addEventListener('click', () => {
        const currentLink = box.querySelector('a')
        barba.go(currentLink.href)
      })
    })
    const expertsFilter = new ExpertsFilter({
      buttons: '.experts-filter__btn',
      catBtns: '.experts-filter__category',
      experts: '.experts__box',
      reset: '#experts-filter-reset',
      wrap: '#experts-filter'
    })
  }, 0)
}
