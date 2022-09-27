const postTagsPaint = () => {
  const postTags = document.querySelectorAll('.postcard-tag')
  const introTags = document.querySelectorAll('.intro__tag')
  const tags = [...postTags, ...introTags]
  if (tags.length) {
    const services = pageState.cats[0].map(item => item.title)
    tags.forEach(tag => {
      if (services.includes(tag.innerText.toLowerCase())) {
        tag.classList.add('postcard-tag--service')
      }
    })
  }
}
