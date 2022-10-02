/**
 * Change active slide
 *
 * @param {node} controlElt
 * @param {node} slideElt
 */
const changeSlide = (controlElt, slideElt) => {
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

/**
 * Build slides DOM elements
 *
 * @param {json} slide
 * @param {int} index
 * @param {node} container
 * @returns node
 */
const buildSlide = (slide, index, container) => {
  // Build Slide container
  const slideElt = document.createElement('div')
  slideElt.id = 'slide_' + index
  slideElt.classList.add('slide')
  if (index === 0) {
    slideElt.classList.add('active')
  }

  // Build Slide body
  const slideBodyElt = document.createElement('div')
  slideBodyElt.classList.add('slide-body')

  // Build Slide Title
  const slideTitleElt = document.createElement(slide.title.tag)
  slideTitleElt.classList.add('slide-title')
  slideTitleElt.innerText = slide.title.content
  slideBodyElt.appendChild(slideTitleElt)

  // Build Slide Description
  const slideTextElt = document.createElement('p')
  slideTextElt.classList.add('slide-text')
  slideTextElt.classList.add('text-justify')
  slideTextElt.innerHTML = slide.description
  slideBodyElt.appendChild(slideTextElt)

  // Build Slide price
  const slicePriceElt = document.createElement('p')
  slicePriceElt.classList.add('slide-price')
  slicePriceElt.innerHTML = slide.price + '<sup>&euro;</sup>'
  slideBodyElt.appendChild(slicePriceElt)

  // Build Slide footer
  const slideFooterElt = document.createElement('div')
  slideFooterElt.classList.add('slide-footer')

  // Build Slide infos button
  const slideInfosBtn = document.createElement('a')
  slideInfosBtn.href = '#'
  slideInfosBtn.classList.add('app-btn')
  slideInfosBtn.innerText = 'Plus de détails'
  slideFooterElt.appendChild(slideInfosBtn)

  // Build Slide Order button
  const slideOrderBtn = document.createElement('a')
  slideOrderBtn.href = '#'
  slideOrderBtn.classList.add('app-btn')
  slideOrderBtn.classList.add('cta')
  if (slide.stock > 0) {
    slideOrderBtn.classList.add('bg-success')
    slideOrderBtn.innerText = 'Je les achète'
  } else {
    slideOrderBtn.innerText = 'Je commande'
  }
  slideFooterElt.appendChild(slideOrderBtn)

  // Append Slide footer to Slide body
  slideBodyElt.appendChild(slideFooterElt)

  // Append Slide body to Slide
  slideElt.appendChild(slideBodyElt)

  // Build Slide image
  const slideFigureElt = document.createElement('figure')
  slideFigureElt.classList.add('slide-img')
  const slideImgElt = document.createElement('img')
  slideImgElt.classList.add('slide-img-top')
  slideImgElt.src = 'assets/img/catalog/shoes/' + slide.img
  slideImgElt.alt = slide.alt
  slideFigureElt.appendChild(slideImgElt)
  // Build slide flag
  const slideFlagElt = document.createElement('figcaption')
  slideFlagElt.classList.add('flag')
  if (slide.stock === 0) {
    slideFlagElt.classList.add('bg-secondary')
    slideFlagElt.innerText = 'En précommande'
  } else {
    slideFlagElt.classList.add('bg-success')
    slideFlagElt.innerText = slide.stock + ' en stock'
  }
  slideFigureElt.appendChild(slideFlagElt)

  // Append Slide image to Slide
  slideElt.appendChild(slideFigureElt)

  // Append Slide to Slider container
  container.appendChild(slideElt)

  return slideElt
}

/**
 * Build slider controls DOM elements
 *
 * @param {node} controls
 * @param {node} slideElt
 * @param {int} index
 */
const buildControls = (controls, slideElt, index) => {
  // Build Slide Controls container
  const slideControlElt = document.createElement('a')
  slideControlElt.href = '#'
  slideControlElt.dataset.refid = 'slide_' + index
  if (index === 0) {
    slideControlElt.classList.add('active')
  }
  // Event listener on Control button
  slideControlElt.addEventListener('click', event => {
    changeSlide(event.target.parentNode, slideElt)
  })

  // Buils Slide control inactive
  const inactiveBtn = document.createElement('i')
  inactiveBtn.classList.add('fa-regular')
  inactiveBtn.classList.add('fa-circle')
  slideControlElt.appendChild(inactiveBtn)

  // Buils Slide control active
  const activeBtn = document.createElement('i')
  activeBtn.classList.add('fa-solid')
  activeBtn.classList.add('fa-circle')
  slideControlElt.appendChild(activeBtn)

  // Append Slide control to Slide Controls container
  controls.appendChild(slideControlElt)
}

/**
 * Build slider slides and controls
 *
 * @param {array} slides
 * @param {node} container
 * @param {node} controls
 */
export const buildSlides = (slides, container, controls) => {
  slides.forEach((slide, index) => {
    // Build slides
    const slideElt = buildSlide(slide, index, container)

    // Build slides controls
    buildControls(controls, slideElt, index)
  })
}
