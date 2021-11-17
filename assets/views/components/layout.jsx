import React from "react";
import Social from './Social/Social';
import Navbar from './navbar/Navbar';
import Footer from './footer/Footer';
import Cursor from './Cursor/Cursor';

export default function Layout({ children }) {
    return (
        <div>
            <Cursor />
            <Navbar/>
            <Social/>
            <div>{children}</div>
            <Footer/>
        </div>
    );
}