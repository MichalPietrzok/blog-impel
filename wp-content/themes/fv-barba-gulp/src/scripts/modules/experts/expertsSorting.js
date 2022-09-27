class ExpertsSorting {
  constructor(props) {
    this.links = document.querySelectorAll(props.links)

    this.links.forEach($link => {
      $link.addEventListener('click', (e) => {
        e.preventDefault()
        this.sorting($link.dataset.href)
      })
    })
  }

  sorting(val) {
    const linkParams = new URLSearchParams(val)
    const newOrder = linkParams.get('order')
    const urlParams = new URLSearchParams(location.search)

    urlParams.set('order', newOrder)
    barba.go(`?${decodeURIComponent(urlParams.toString())}`)
  }
}
