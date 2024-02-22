import React from "react";
import ViewComponents from "./components/viewComponents1";
import ViewProps from "./components/viewProps";
function App() {
  return (
    <div className="App">
      <ViewComponents/>
      <ViewProps name="visto" age="23"/>
    </div>
  );
}

export default App;
