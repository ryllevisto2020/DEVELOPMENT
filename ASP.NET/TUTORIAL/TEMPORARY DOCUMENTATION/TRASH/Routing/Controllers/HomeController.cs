using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.WebUtilities;
using Newtonsoft.Json;
using Routing.Model;
using System.Net.Http.Json;
using System.Text;
using System.Text.Json.Serialization;

namespace Routing.Controllers
{
    public class HomeController : Controller
    {
        public IActionResult Index()
        {
            return View("Index");//View("<Name of Views>")
        }
        public IActionResult parameters(int id)
        {

            return View("optionalParamaters",id);//View("<Name of Views>",<pass data to views>)
        }
        public IActionResult query_parameters()
        {
            var id = HttpContext.Request.Query["id"];
            return View("queryParameters",id);//View("<Name of Views>",<pass data to views>)
        }
        public IActionResult post_data(int id)
        {
            StreamReader reader = new StreamReader(HttpContext.Request.Body);//Get Request Body
            var a = reader.ReadToEndAsync();
            var b = JsonConvert.DeserializeObject<List<i>>(a.Result.ToString());
            foreach (var item in b)
            {
                Console.WriteLine(item.id);
            }
            return View("postData",b);//View("<Name of Views>",<pass data to views>)
        }
    }
}
class i
{
    public int id { get; set; }
}