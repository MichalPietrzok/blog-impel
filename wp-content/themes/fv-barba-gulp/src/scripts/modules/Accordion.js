class Accordion {
  constructor(mainWrap, order) {
    this.wrap = mainWrap
    this.button = this.wrap.querySelector('[data-accordion="button"]')
    this.content = this.wrap.querySelector('[data-accordion="content"]')
    this.icon = this.wrap.querySelector('[data-accordion="icon"]')
    this.expanded = true
    this.order = order
    this.button.addEventListener('click', () => { this.toggleAccordion() })
  }

  closeAccordion(exclude) {
    if (this.order !== exclude) {
      this.expanded = true
      gsap.timeline()
        .to(this.content, 0.2, { height: 0, opacity: 0 })
        .to(this.icon, { rotate: 0 }, '<')
    }
  }

  openAccordion() {
    this.expanded = false
    gsap.set(this.content, { height: 'auto', opacity: 1 })
    gsap.timeline()
      .from(this.content, 0.2, { height: 0, opacity: 0 })
      .to(this.icon, { rotate: -180 }, '<')
  }

  toggleAccordion() {
    const action = this.expanded ? 'openAccordion' : 'closeAccordion'
    this[action]()
  }
}
