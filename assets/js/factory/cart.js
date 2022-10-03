import { cartData } from '../../../src/data/cart.js'

export const cartFactory = cartContainer => {
  /**
   * Build cart from data
   */
  const build = () => {
    displayCount()

    if (cartData.length > 0) {
      cartData.forEach((cartItem, index) => {
        buildItem(cartItem, index)
      })
    }
  }

  /**
   * Display number of items in cart and cart total, message if empty
   *
   * @param {integer} nbItems
   */
  const displayCount = () => {
    const nbItems = cartData.reduce((nb, item) => {
      return nb + parseInt(item.qty)
    }, 0)
    const cartTotal = cartData.reduce((total, item) => {
      return total + parseInt(item.price * item.qty)
    }, 0)

    const message = document.createElement('p')
    if (nbItems > 0) {
      message.classList.add('text-success')
      message.innerHTML =
        'Il y a ' +
        nbItems +
        ' paire' +
        (nbItems > 1 ? 's' : '') +
        ' de SHOE dans ton panier pour un montant total de ' +
        cartTotal +
        '&euro;'
    } else {
      message.classList.add('text-secondary')
      message.innerText = 'Ton panier est désespérément vide…'
    }
    cartContainer.appendChild(message)
  }

  const buildItem = (itemData, index) => {
    const itemContainer = document.createElement('div')
    itemContainer.classList.add('item')
    itemContainer.appendChild(buildLink([buildImage(itemData.img)]))
    itemContainer.appendChild(
      buildLink([
        buildTitle(itemData.title),
        buildDescription(itemData.description)
      ])
    )
    itemContainer.appendChild(buildQuantity(itemData.qty))
    itemContainer.appendChild(buildPrice(itemData.price))
    itemContainer.appendChild(buildTotal(itemData.price * itemData.qty))
    cartContainer.appendChild(itemContainer)
  }

  const buildLink = elts => {
    const itemLink = document.createElement('a')
    itemLink.href = '#'
    elts.forEach(elt => {
      itemLink.appendChild(elt)
    })
    return itemLink
  }

  const buildImage = img => {
    const itemImg = document.createElement('img')
    itemImg.src = 'assets/img/catalog/shoes/' + img.src
    itemImg.alt = img.alt
    return itemImg
  }

  const buildTitle = title => {
    const itemTitle = document.createElement('h3')
    itemTitle.classList.add('item-title')
    itemTitle.innerText = title
    return itemTitle
  }

  const buildDescription = description => {
    const itemDescription = document.createElement('p')
    itemDescription.classList.add('item-description')
    itemDescription.innerText = description
    return itemDescription
  }

  const buildQuantity = qty => {
    const itemQty = document.createElement('p')
    itemQty.classList.add('item-qty')
    itemQty.innerText = qty + 'x'
    return itemQty
  }

  const buildPrice = price => {
    const itemPrice = document.createElement('p')
    itemPrice.classList.add('item-price')
    itemPrice.innerText = price + '€'
    return itemPrice
  }

  const buildTotal = total => {
    const itemTotal = document.createElement('p')
    itemTotal.classList.add('item-total')
    itemTotal.innerText = total + '€'
    return itemTotal
  }

  return { build }
}
