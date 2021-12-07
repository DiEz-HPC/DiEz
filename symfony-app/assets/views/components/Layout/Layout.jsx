import React, { useEffect, useState } from 'react'
import Social from '../Social/Social'
import Navbar from '../navbar/Navbar'
import Footer from '../footer/Footer'
import Cursor from '../Cursor/Cursor'
import ScrollUp from '../ScrollUp/ScrollUp'
import { getAllSocials } from '../../../queries/socials'
import { motion } from 'framer-motion'

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
    <motion.div
    variants={variants} // Pass the variant object into Framer Motion 
    initial="hidden" // Set the initial state to variants.hidden
    animate="enter" // Animated state to variants.enter
    exit="exit" // Exit state to variants.exit
    transition={{ type: 'ease-in' }} // Set the transition to linear
    >
      <Cursor />
      <Navbar socials={socials} />
      <Social socials={socials} />
      <ScrollUp />
      <div>{children}</div>
      <Footer />
    </motion.div>
  )
}
