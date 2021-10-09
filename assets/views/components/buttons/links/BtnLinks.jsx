import React from "react";
import PropTypes from "prop-types";
import './btnlinks.scss'
import {Button} from "@mui/material";

function BtnLinks(props) {
    const {link, label, variant, style, color} = props
    return (
        <>
            <Button href={link} className={`btnLink ${style}`} variant={variant} color={color}>{label}</Button>
        </>
    );
}

BtnLinks.propTypes = {
    link: PropTypes.string.isRequired,
    label: PropTypes.string.isRequired,
    style: PropTypes.string.isRequired,
    variant: PropTypes.string.isRequired
}

export default BtnLinks