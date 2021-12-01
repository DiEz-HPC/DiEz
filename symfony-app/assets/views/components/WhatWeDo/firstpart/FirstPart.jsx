import React from 'react'
import './FirstPart.scss'
import Card from '../card/Card'
import CartLogo from '../../../../images/sac_icon.png'
import PcLogo from '../../../../images/pc_icon.png'
import CoffeeLogo from '../../../../images/cofee_icon.png'

function FirstPart() {
  return (
    <div className="First-outer-container ps-lg-5">
      <div className="first_part row mb-5 d-flex justify-content-around ">
        <Card
          icon={CartLogo}
          title="Site Web et E-commerce"
          text="Nous développons des sites web et E-commerce <span class='highlight'>sur mesure</span> optimisé pour <span class='highlight'>toutes plateforme</span> (mobile, tablette, ordinateur). <br> De la maquette au déploiement, laissez <span class='highlight'>notre expertise vous accompagnez</span> durant tout le processus de création."
          BtnLink='/qui-sommes-nous'
          BtnLabel="En savoir plus"
          aos="fade-up"
          duration="500"
        />
        <Card
          icon={PcLogo}
          title="Un site web performant"
          text="Nous utilisons les <span class='highlight'>dernières technologies open source</span>, réalisons des <span class='highlight'>tests de fonctionnalités</span>, pratiquons la <span class='highlight'>relecture de code</span> afin de produire et vous livrer un <span class='highlight'>code de qualité, optimisé et facilement maintenable</span>"
          BtnLink='/qui-sommes-nous'
          BtnLabel="En savoir plus"
          aos="fade-up"
          duration="1000"
        />
        <Card
          icon={CoffeeLogo}
          title="Une équipe disponible"
          text="Grace à notre méthodologie de travail <span class='highlight'>AGILE*</span>, nous serons en <span class='highlight'>étroite collaboration</span> avec vous lors des <span class='highlight'>étapes clé de votre projet</span> afin de vous livrer un produit <span class='highlight'>conforme à vos attentes et envies.</span>"
          BtnLink='/qui-sommes-nous'
          BtnLabel="En savoir plus"
          aos="fade-up"
          duration="2000"
        />
      </div>
    </div>
  )
}

export default FirstPart
