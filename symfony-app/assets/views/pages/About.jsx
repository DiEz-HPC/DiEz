import React from 'react'
import FirstPart from '../components/About/First-Part/FirstPart'
import FourthPart from '../components/About/Fourth-Part/FourthPart'
import Skill from '../components/About/Skill/Skill'
import Staff from '../components/About/Staff/Staff'
import Layout from '../components/Layout/Layout'
import Pict2 from '../../images/about1.jpg'
import Pict1 from '../../images/about2.jpg'
import Pict3 from '../../images/about3.jpg'

function About() {
  const skillsData = {
    data1: {
      img: Pict1,
      title: 'Web design & développement',
      list: [
        'Développement de site personnalisé',
        "Optimisation de l'expérience utilisateur",
        'Optimisation du SEO',
        'Site web performant',
        "Création et déploiement d'API",
      ],
    },
    data2: {
      img: Pict2,
      title: 'Technologies',
      list: [
        'HTML / CSS',
        'PHP > 7.4',
        'Framework SYMFONY > 5',
        'Wordpress',
        'API REST / API Plateform',
        'React JS',
        'Gatsby JS',
      ],
    },
  }

  return (
    <Layout>
      <div className={'about'}>
        <section className={'about-first-part'} id="aboutCompany">
          <FirstPart />
        </section>
        <section className={'about-second-part'}>
          <div className="m-5">
            <Skill {...skillsData.data1} textSide={'text-right'} />
            <Skill
              reverse={'-reverse'}
              {...skillsData.data2}
              textSide={'text-left'}
            />
          </div>
        </section>
        <section className={'about-third-part'} id="aboutStaff">
          <Staff />
        </section>
        <section className={'about-fourth-part'}>
          <FourthPart image={Pict3} />
        </section>
      </div>
    </Layout>
  )
}

export default About
