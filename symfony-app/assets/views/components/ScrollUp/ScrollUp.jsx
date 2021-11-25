import React from 'react'
import './scrollUp.scss'

export default function ScrollUp() {
  const [isVisible, setIsVisible] = React.useState(false)

  React.useEffect(() => {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 1000) {
        setIsVisible(true)
      } else {
        setIsVisible(false)
      }
    })
  })

  const scrollToTop = () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    })
  }

  return (
    <div id="scrollUpButton" data-bs-toggle="tooltip" data-bs-placement="top" title="Haut de page">
      <div
        className={`scroll-up ${
          isVisible ? 'show' : ''
        } d-flex align-items-center justify-content-center`}
        onClick={scrollToTop}
      >
        <i className="fas fa-chevron-up"></i>
      </div>
    </div>
  )
}
