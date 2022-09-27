class Header {
  constructor() {
    this.mainMenuItems = document.querySelectorAll('.header-main__item')
    this.mainNav = document.querySelector('#main-nav ul')
    this.mainNavFirstItem = this.mainNav.querySelector('li')
    this.addMobileMenuItems()
  }

  addMobileMenuItems() {
    this.mainMenuItems.forEach(item => {
      const proxyItem = item.cloneNode(true)
      proxyItem.classList.add('d-xl-none')
      this.mainNav.appendChild(proxyItem)
    })
  }
}

const mainHeader = new Header()
