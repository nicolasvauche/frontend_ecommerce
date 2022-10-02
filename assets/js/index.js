import { slides } from '../../src/data/slider.js'
import { buildSlides } from './modules/slider.js'

window.addEventListener('DOMContentLoaded', () => {
  // Get Slider container
  const sliderElt = document.getElementById('slider')
  // Get Slider Controls container
  const sliderControlsElt = sliderElt.querySelector('.controls')
  // Build Slides and controls
  buildSlides(slides, sliderElt, sliderControlsElt)
})
