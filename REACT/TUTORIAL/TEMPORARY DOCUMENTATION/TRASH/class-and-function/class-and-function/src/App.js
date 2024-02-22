import class_sample from './class_and_function/class_sample';
function App() {
  let classObj = new class_sample("1","visto");
  console.log(classObj.get());
  return (
    <div className="App">
    </div>
  );
}

export default App;
