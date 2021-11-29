import React, {useEffect, useState} from 'react'
import Social from '../Social/Social'
import Navbar from '../navbar/Navbar'
import Footer from '../footer/Footer'
import Cursor from '../Cursor/Cursor'
import ScrollUp from '../ScrollUp/ScrollUp'
import {getAllSocials} from "../../../queries/socials";

export default function Layout({ children }) {

    const  [socials, setSocials] = useState([]);
    useEffect(async () => {
        const query = await getAllSocials;
        const data = await query.json();
        setSocials(data);
    }, []);

  return (
    <div>
      <Cursor />
      <Navbar socials={socials} />
      <Social socials={socials} />
      <ScrollUp />
      <div>{children}</div>
      <Footer />
    </div>
  )
}
