using Microsoft.AspNetCore.Mvc;

namespace ViewBag_and_ViewData.Controllers
{
    public class ViewBagController : Controller
    {
        public IActionResult Index()
        {
            int[] id = { 1, 2, 3 };
            
            ViewBag.SampleBag = "Visto Sample Bag";
            ViewBag.SampleBag_Object_Class = new sampleBag()
            {
                SampleBag_value = "Visto Sample Bag from Object/Class"
            };
            ViewBag.SampleBag_array = id;
            return View("ViewBag");
        }
    }
}

class sampleBag
{
    public string? SampleBag_value { get; set; }
}