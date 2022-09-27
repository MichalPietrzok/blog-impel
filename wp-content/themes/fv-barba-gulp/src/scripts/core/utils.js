// get node element / collection--------------------
const elt = (element) =>
  document.querySelector(element)

const elts = (elements) =>
  document.querySelectorAll(elements)
// --------------------get node element / collection

// add css styles to target-------------------------
const addElementStyles = (elements, obj) => {
  const itemsNodeList = document.querySelectorAll(elements)
  Object.keys(obj).map(item => {
    if (!itemsNodeList.length) {
      itemsNodeList[0].style[item] = obj[item]
    } else {
      Array.from(itemsNodeList).map(element => element.style[item] = obj[item])
    }
  })
}
// -------------------------add css styles to target

// change active element in collection--------------
const changeActive = (elts, n, eltsParent) => {
  let currentElements = document.querySelectorAll(`${eltsParent ? eltsParent + ' ' : ''} .${elts}`);
  for (let i = 0; i < currentElements.length; i++) {
    if (currentElements[i]) {
      currentElements[i].classList.remove(`${elts}--active`);
    }
  }
  if (currentElements[n]) {
    currentElements[n].classList.add(`${elts}--active`);
  }
}
// --------------change active element in collection

// start-page-state---------------------------------
const searchCurrentMainMenuLink = (currentLocation, mainMenuLinks, elementsToActive) => {
  let currentPage = null;
  
  const linksNodeList = document.querySelectorAll(`${mainMenuLinks} a`)
  for (let i = 0; i < linksNodeList.length; i++) {
    if (linksNodeList[i].href === currentLocation || `${linksNodeList[i].href}/` === currentLocation) {
      currentPage = i
    }
  }
  changeActive(elementsToActive, currentPage, mainMenuLinks)
}
// ---------------------------------start-page-state

// add max height to each item in collection----------------- 
const equalHeigth = (targetItems) => {
  let maxHeight = 0;
  const itemsNodeList = document.querySelectorAll(targetItems)
  if (screen.width > 992) {
    for (let i = 0; i < itemsNodeList.length; i++) {
      if (maxHeight < itemsNodeList[i].offsetHeight) {
        maxHeight = itemsNodeList[i].offsetHeight;
      }
    }
    for (let i = 0; i < itemsNodeList.length; i++) {
      itemsNodeList[i].style.height = `${maxHeight}px`
    }
  }
}

// add max height to each item in collection-----------------

const getCoords = (elem) => {
  let box = elem.getBoundingClientRect();

  let body = document.body;
  let docEl = document.documentElement;

  let scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
  let scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

  let clientTop = docEl.clientTop || body.clientTop || 0;
  let clientLeft = docEl.clientLeft || body.clientLeft || 0;

  let top = box.top + scrollTop - clientTop;
  let left = box.left + scrollLeft - clientLeft;

  return {
    top: top,
    left: left
  };
}

const delay = (n = 100) => new Promise((done) => setTimeout(() => done(), n));


const shuffle = (arr) => {
  arr.sort(() => Math.random() - 0.5)
}

const flexSize = size =>
  screen.width > 1920 ? `${(size / 1920) * 100}vw` : `${size}px`

const timeConverter = (timeInSeconds) => {
  const hours = Math.floor(timeInSeconds / 60 / 60);
  const minutes = Math.floor(timeInSeconds / 60) - (hours * 60);
  const seconds = Math.floor(timeInSeconds % 60);
  return `${minutes}:${seconds} min`
}

const mobileMenuToggle = (act) => {
  elt('.header').classList[act]('header--open');
  elt('.header__button').classList[act]('header__button--open');
  elt('#main-nav').classList[act]('navigation--open');
}
