class Page {
  constructor(pageName) {
    this.namespace = pageName;
  }

  beforeEnter() {
    // code for each page-------------------
    mobileMenuToggle('remove');
    setTimeout(() => {
      searchCurrentMainMenuLink(location.href, '#main-nav', 'navigation__item')
      searchCurrentMainMenuLink(location.href, '#footer-nav', 'navigation__item')
    }, 10)
    // -------------------code for each page
    this.beforeEnterFunction()
  }
  afterEnter() {
    // code for each page-------------------
    setTimeout(() => {
      window.scrollTo({ top: 0, behavior: 'instant' })
      gsap.timeline().from('.main-info', { opacity: 0 })
    }, 0)
    // -------------------code for each page
    this.afterEnterFunction();
  }
  beforeLeave() {
    
    gsap.timeline().to('.main-info', { opacity: 0 })
    if(this.beforeLeaveFunction) {
      this.beforeLeaveFunction();
    }
  }
}

