const pageState = {
  currentPostsPage: 1,
  readyToLoad: false,
  cats: [[], []],

  getCats() {
    const services = document.querySelector('.navigation__services .sub-menu')
    const bussines = document.querySelector('.navigation__bussines .sub-menu')
    const subMenus = [services, bussines]
    subMenus.forEach((ul, index) => {
      const items = ul.querySelectorAll('li')
      items.forEach(li => {
          const currentLink = li.querySelector('a')
          const linkPath = currentLink.pathname;
          this.cats[index].push({
            slug: linkPath.slice(linkPath.lastIndexOf('/', linkPath.length - 2) + 1, -1),
            title: currentLink.innerText.toLowerCase()
          })
        }
      )
    })
  }
}