import React from 'react'
import PropTypes from 'prop-types'
import './btnlinks.scss'


function BtnLinks(props) {
  const { link, label, variant, color, style, target } = props

  return (
    <div className={`btnLink btnLink-${variant}-${color} text-center ${style}`}>
      <a href={link} target={target}>
        <button className="blob-btn" aria-hidden="true">
          <div className="labelBtn">{label}</div>
          <span className="blob-btn__inner">
            <span className="blob-btn__blobs">
              <span className="blob-btn__blob"/>
              <span className="blob-btn__blob"/>
              <span className="blob-btn__blob"/>
              <span className="blob-btn__blob"/>
            </span>
          </span>
        </button>
      </a>
      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" className="svgBtn">
        <defs>
          <filter id="goo">
            <feGaussianBlur
              in="SourceGraphic"
              result="blur"
              stdDeviation="10"
            />
            <feColorMatrix
              in="blur"
              mode="matrix"
              values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7"
              result="goo"
            />
            <feBlend in2="goo" in="SourceGraphic" result="mix"/>
          </filter>
        </defs>
      </svg>
    </div>
  )
}

BtnLinks.propTypes = {
  link: PropTypes.string.isRequired,
  label: PropTypes.string.isRequired,
  color: PropTypes.string.isRequired,
  variant: PropTypes.string.isRequired,
}

export default BtnLinks
