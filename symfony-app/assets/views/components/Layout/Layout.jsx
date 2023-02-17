import React, { useEffect, useState } from 'react'
import Social from '../Social/Social'
import Navbar from '../navbar/Navbar'
import Footer from '../footer/Footer'
import ScrollUp from '../ScrollUp/ScrollUp'
import { getAllSocials } from '../../../queries/socials'

export default function Layout({ children }) {
  const variants = {
    hidden: { opacity: 0, x: 0, y: 0 },
    enter: { opacity: 1, x: 0, y: 0 },
    exit: { opacity: 0, x: 0, y: 0 },
  }
  const [socials, setSocials] = useState([])
  useEffect(async () => {
    const query = await getAllSocials
    const data = await query.json()
    setSocials(data)
  }, [])

  return (
<>

      <Navbar socials={socials} />
      <Social socials={socials} />
      <ScrollUp />
      <div>{children}</div>
      <Footer />
</>
  )
}
