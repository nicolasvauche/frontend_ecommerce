import { cartFactory } from './factory/cart.js'

window.addEventListener('DOMContentLoaded', () => {
  // Get Cart container
  const cartContainer = document.getElementById('cart')
  // Build Cart
  const cart = cartFactory(cartContainer.querySelector('.cart-items'))
  cart.build()
})
