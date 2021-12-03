import React from 'react'
import './ThirdPart.scss'
import '../../../../styles/device.min.scss'
import Button from '../../buttons/links/BtnLinks'
import PhonePic from '../../../../images/jobpermutmobile.webp'
import ComputerPic from '../../../../images/JobPermutPc.webp'
import TabletPic from '../../../../images/jobpermuttablet.webp'
import IphoneX from '../../edevices/iphoneX/IphoneX'
import Ipad from './device/Ipad'
import Macbook from '../../edevices/macbookPro/MacbookPro'
import Dot from '../../dot/Dot'

function ThirdPart() {
  return (
    <div className="thirdPart">
      <div className="inner-container row d-flex justify-content-evenly" data-aos="fade-up">
        <div className="device-div col-md-4 row">
          <Macbook image={ComputerPic} scale="90" alt="MacBook" />
          <Ipad picture={TabletPic} scale="90" alt="ipad" />
          <IphoneX image={PhonePic} scale="90" alt="iphoneX" />
        </div>
        <div className="text-div col-12 col-md-4" data-aos="fade-up">
          <h2 className="text-start">
            Conception et développement de sites Web personnalisés, pour vos
            projets de tous types et tailles
            <Dot color={'#56C6FF'} />
          </h2>
          <p className="text-start">
            Notre équipe de passionnés, formée aux dernières technologies, est à
            votre disposition pour réaliser le projet de vos rêves. Notre
            objectif est de vous satisfaire et nous utiliserons toutes les
            ressources necessaire afin de vous apporter la plus grande
            satisfaction.
          </p>
          <div className="d-flex flex-column justify-content-around flex-md-row align-items-center">
            <Button
              link={'#projects'}
              label={'Nos projets'}
              color={'white'}
              style={'m-1'}
              variant={'outlined'}
            />
            <Button
              link={'#'}
              label={'Contact'}
              color={'dark'}
              style={'me-1'}
              variant={'contained'}
            />
          </div>
        </div>
      </div>
    </div>
  )
}

export default ThirdPart
