// libraries classes

/*	
Title : RequestManager
Developer : Daham Kaushika
Description : send request.
Developed Date : 2024.02.28
*/
class RequestManager {
  sendRequest() {
    const loadUIComp = async (index) => {
      // server call
      const componentString = await fetch("ui.comp.php").then((res) =>
        res.text()
      );
      const comp = renderFromString(componentString); // create DOM Element by sting from response

      // update UI with data later using DOM manipulation
      document.getElementById("container").appendChild(comp);
    };

    // just to test if it work with dynamic data
    for (let index = 0; index < 5; index++) {
      loadUIComp(index);
    }

    // actual function of string to DOM Element
    function renderFromString(htmlString) {
      const container = document.createElement("div");
      container.innerHTML = htmlString;
      return container.firstChild; // Extract the first child element
    }
  }
}
