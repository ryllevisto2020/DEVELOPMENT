import React from "react";

function ViewProps(props) {
    console.log(props);
    return (
        <>
        <h1>this is { props.name } | Age: {props.age}</h1>
        </>
    );
  }

export default ViewProps;

