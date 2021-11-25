import React from 'react'
import Social from '../Social/Social'
import Navbar from '../navbar/Navbar'
import Footer from '../footer/Footer'
import Cursor from '../Cursor/Cursor'
import ScrollUp from '../ScrollUp/ScrollUp'

export default function Layout({ children }) {
  return (
    <div>
      <Cursor />
      <Navbar />
      <Social />
      <ScrollUp />
      <div>{children}</div>
      <Footer />
    </div>
  )
}
