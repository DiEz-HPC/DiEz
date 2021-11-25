import React from 'react'
import '../../styles/404.scss'
import Layout from '../components/Layout/Layout'
function NotFound() {
  return (
    <Layout>
      <div className={'notFound'}>
        <div className={'notFound__container'}>
          <div className="lines">
            <div className="line"></div>
            <div className="line"></div>
            <div className="line"></div>
            <div className="line"></div>
            <div className="line"></div>
          </div>
          <div className="d-flex justify-content-center align-items-center NotFoundContainer">
            <div className="text-center">
              <h1 className="title">404</h1>
              <h2>OUPS ! RIEN N'A ÉTÉ TROUVÉ</h2>
              <p>
                La page que vous recherchez a peut-être été supprimée, a changé
                de nom ou est temporairement indisponible.
              </p>
              <a href="/" className="btn btn-outline-primary btnNotFound">
                Retour à l'accueil
              </a>
            </div>
          </div>
        </div>
      </div>
    </Layout>
  )
}

export default NotFound
