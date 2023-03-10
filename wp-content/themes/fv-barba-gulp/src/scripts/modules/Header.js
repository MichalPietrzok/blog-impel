class Header {
  constructor() {
    this.mainMenuItems = document.querySelectorAll('.header-main__item')
    this.mainNav = document.querySelector('#main-nav ul')
    this.mainNavFirstItem = this.mainNav.querySelector('li')
    this.parentsItems = this.mainNav.querySelectorAll('.menu-item-has-children')
    this.emptyLinks = this.mainNav.querySelectorAll('a[href="#"]')
    this.burger = document.querySelector('.header__button')

    this.emptyLinks.forEach(link => {
      link.addEventListener('click', (e) => { e.preventDefault() })
    })

    this.burger.addEventListener('click', () => {
      const subMenus = this.mainNav.querySelectorAll('.sub-menu')
      const links = this.mainNav.querySelectorAll('a[href="#"]')
      subMenus.forEach(menu => { menu.classList.remove('active') })
      links.forEach(link => { link.classList.remove('active') })
    })
    this.parentsItems.forEach(item => {
      item.addEventListener('click', (e) => {
        e.stopPropagation()
        this.swithMenu(item, 'toggle')
      })
    })
    this.addMobileMenuItems()
  }

  addMobileMenuItems() {
    this.mainMenuItems.forEach(item => {
      const proxyItem = item.cloneNode(true)
      proxyItem.classList.add('d-xl-none')
      proxyItem.dataset.barbaPrevent = 'all'
      this.mainNav.appendChild(proxyItem)
    })
  }

  swithMenu(item, mod) {
    const currentMenu = item.querySelector('.sub-menu')
    const currentLink = item.querySelector('a[href="#"]')
    const subMenus = currentMenu.querySelectorAll('.menu-item-has-children')
    currentMenu.classList[mod]('active')
    currentLink.classList[mod]('active')
    if (subMenus.length) {
      subMenus.forEach(subMenu => {
        this.swithMenu(subMenu, 'remove')
      })
    }
  }
}

const mainHeader = new Header()
