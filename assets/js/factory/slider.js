import { slidesData } from '../../../src/data/slider.js'

/**
 * Slider Factory
 *
 * @param {node} sliderContainer
 * @returns
 */
export const sliderFactory = (sliderContainer, sliderControls) => {
  /**
   * Build slider from data
   */
  const build = () => {
    slidesData.forEach((slideData, index) => {
      buildSlides(slideData, index)
      buildControls(slideData, index)
    })
  }

  /**
   * Build slider controls
   *
   * @param {json} slideData
   * @param {integer} index
   */
  const buildControls = (slideData, index) => {
    const slideControl = document.createElement('a')
    slideControl.href = '#'
    if (index === 0) {
      slideControl.classList.add('active')
    }

    slideControl.appendChild(buildIcon(true))
    slideControl.appendChild(buildIcon())

    slideControl.addEventListener('click', event => {
      changeSlide(event.target.parentNode, index)
    })
    sliderControls.appendChild(slideControl)
  }

  /**
   * Build slide control icon
   *
   * @param {boolean} isActive
   * @returns
   */
  const buildIcon = (isActive = false) => {
    const iconElt = document.createElement('i')
    iconElt.classList.add(isActive ? 'fa-solid' : 'fa-regular')
    iconElt.classList.add('fa-circle')
    return iconElt
  }

  /**
   * Build slide slides
   *
   * @param {json} slideData
   * @param {int} index
   */
  const buildSlides = (slideData, index) => {
    const slideContainer = document.createElement('div')
    slideContainer.classList.add('slide')
    slideContainer.id = 'slide_' + index
    if (index === 0) {
      slideContainer.classList.add('active')
    }
    slideContainer.appendChild(buildBody(slideData))
    slideContainer.appendChild(buildImage(slideData.img, slideData.stock))
    sliderContainer.appendChild(slideContainer)
  }

  /**
   * Build slide body container
   *
   * @param {json} slideData
   * @returns
   */
  const buildBody = slideData => {
    const slideBody = document.createElement('div')
    slideBody.classList.add('slide-body')
    slideBody.appendChild(buildTitle(slideData.title))
    slideBody.appendChild(buildDescription(slideData.description))
    slideBody.appendChild(buildPrice(slideData.price))
    slideBody.appendChild(buildFooter(slideData))
    return slideBody
  }

  /**
   * Build slide footer container
   *
   * @param {json} slideData
   * @returns
   */
  const buildFooter = slideData => {
    const slideFooter = document.createElement('div')
    slideFooter.classList.add('slide-footer')
    slideFooter.appendChild(buildButton('Plus de détails'))
    slideFooter.appendChild(
      buildButton(
        slideData.stock > 0 ? 'Je les achète' : 'Je commande',
        true,
        slideData.stock > 0
      )
    )
    return slideFooter
  }

  /**
   * Build slide title
   *
   * @param {json} title
   * @returns
   */
  const buildTitle = title => {
    const slideTitle = document.createElement(title.tag)
    slideTitle.classList.add('slide-title')
    slideTitle.innerText = title.content
    return slideTitle
  }

  /**
   * Build slide description
   *
   * @param {string} description
   * @returns
   */
  const buildDescription = description => {
    const slideDescription = document.createElement('p')
    slideDescription.classList.add('slide-text')
    slideDescription.classList.add('text-justify')
    slideDescription.innerHTML = description
    return slideDescription
  }

  /**
   * Build slide price
   *
   * @param {float} price
   * @returns
   */
  const buildPrice = price => {
    const slidePrice = document.createElement('p')
    slidePrice.classList.add('slide-price')
    slidePrice.innerHTML = price + '<sup>&euro;</sup>'
    return slidePrice
  }

  /**
   * Build slide button
   *
   * @param {string} label
   * @param {boolean} isCta
   * @param {boolean} inStock
   * @returns
   */
  const buildButton = (label, isCta = false, inStock = false) => {
    const slideBtn = document.createElement('a')
    slideBtn.classList.add('app-btn')
    if (isCta) {
      slideBtn.classList.add('cta')
    }
    if (inStock) {
      slideBtn.classList.add('bg-success')
    }
    slideBtn.href = '#'
    slideBtn.innerText = label
    return slideBtn
  }

  /**
   * Build slide image container, with image and tag inside
   *
   * @param {json} img
   * @param {int} stock
   * @returns
   */
  const buildImage = (img, stock) => {
    const slideImgContainer = document.createElement('figure')
    slideImgContainer.classList.add('slide-img')

    const slideImg = document.createElement('img')
    slideImg.classList.add('slide-img-top')
    slideImg.src = 'assets/img/catalog/shoes/' + img.src
    slideImg.alt = img.alt
    slideImgContainer.appendChild(slideImg)
    slideImgContainer.appendChild(buildImageTag(stock))

    return slideImgContainer
  }

  /**
   * Build slide tag
   *
   * @param {int} stock
   * @returns
   */
  const buildImageTag = stock => {
    const slideTag = document.createElement('figcaption')
    slideTag.classList.add('flag')
    if (stock > 0) {
      slideTag.classList.add('bg-success')
      slideTag.innerText = 'Il en reste encore ' + stock
    } else {
      slideTag.classList.add('bg-secondary')
      slideTag.innerText = 'En précommande'
    }
    return slideTag
  }

  /**
   * Change active slide and control
   *
   * @param {node} controlElt
   */
  const changeSlide = (controlElt, index) => {
    const slideElt = document.getElementById('slide_' + index)

    const slideElts = document.querySelectorAll('#slider .slide')
    slideElts.forEach(slide => {
      slide.classList.remove('active')
    })
    slideElt.classList.add('active')

    const controlElts = document.querySelectorAll('#slider .controls a')
    controlElts.forEach(control => {
      control.classList.remove('active')
    })
    controlElt.classList.add('active')
  }

  return { build }
}
