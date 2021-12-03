import React from 'react'
import wave from '../../images/wave.svg'
import '../../styles/home.scss'
import Description from '../components/description/Description'
import CarouselProjects from '../components/carousels/carouselProjects/CarouselProjects'
import pcFirst from '../../images/pc_first.webp'
import HomeBlog from '../components/HomeBlog/HomeBlog'
import WhatWeDo from '../components/WhatWeDo/Whatwedo'
import Layout from '../components/Layout/Layout'

function Home() {
  return (
    <Layout>
      <div className={'home'}>
        <section className="first-view background-blue d-flex flex-column justify-content-between">
          <div className={'image-pc'}>
            <img className={'pc'} src={pcFirst} alt="pc en arrière plan" />
          </div>
          <Description />
          <div className={'arrowBox text-center mb-3'}>
            <a href="#projects">
              {' '}
              <i
                className="fas fa-angle-double-down arrow"
                id={'arrowIcon'}
              />{' '}
            </a>
          </div>
        </section>
        <section className={'carousel-projects'}>
          <div classname={'waveBox'}>
            <img id={'wave'} className={'wave'} src={wave} alt="wave" />
          </div>
          <CarouselProjects />
        </section>
        <section className={'HomeBlog mt-md-5 pt-md-5'}>
          <HomeBlog />
        </section>
        <section className={'what-we-do mt-md-5 pt-md-5'}>
          <WhatWeDo />
        </section>
      </div>
    </Layout>
  )
}

export default Home
