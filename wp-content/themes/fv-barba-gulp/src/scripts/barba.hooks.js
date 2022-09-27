barba.init({
  debug: false,
  timeout: 5000,
  transitions: [
    {
      async leave(data) {
        await delay(500)
        return true
      },
      async enter(data) {
        await delay(10)
      },
      async once(data) {
        gsap.timeline().to('.site', { opacity: 1, duration: .3 })
        elt('.header__button').addEventListener('click', () => { mobileMenuToggle('toggle') })
        elts('#main-nav .navigation__link').forEach(item => item.addEventListener('click', () => { mobileMenuToggle('toggle') }))
        pageState.getCats()
      }
    }
  ],
  views: [
    Homepage,
    Experts,
    Contact,
    Rodo,
    ...Categories,
    ...Posts,
    ...ExpertsPosts
  ]
})
