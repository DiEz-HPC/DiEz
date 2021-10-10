import React from "react";
import PropTypes from "prop-types";
import './btnlinks.scss'
import {Button} from "@mui/material";

function BtnLinks(props) {
    const {link, label, variant, color} = props
    return (
        <>
            <Button href={link} className={`btnLink btnLink-${variant}-${color} mx-1`} variant={variant} >{label}</Button>
        </>
    );
}

BtnLinks.propTypes = {
    link: PropTypes.string.isRequired,
    label: PropTypes.string.isRequired,
    color: PropTypes.string.isRequired,
    variant: PropTypes.string.isRequired
}

export default BtnLinks