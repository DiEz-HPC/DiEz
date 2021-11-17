import React from "react";
import Social from './Social/Social';
import Navbar from './navbar/Navbar';
import Footer from './footer/Footer';

export default function Layout({ children }) {
    return (
        <div>
            <Navbar/>
            <Social/>
            <div>{children}</div>
            <Footer/>
        </div>
    );
}