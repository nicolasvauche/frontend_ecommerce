import { sliderFactory } from './factory/slider.js'

window.addEventListener('DOMContentLoaded', () => {
  // Get Slider container
  const sliderContainer = document.getElementById('slider')
  // Get Slider Controls container
  const sliderControls = sliderContainer.querySelector('.controls')
  // Build Slides and controls
  const slider = sliderFactory(sliderContainer, sliderControls)
  slider.build()
})
