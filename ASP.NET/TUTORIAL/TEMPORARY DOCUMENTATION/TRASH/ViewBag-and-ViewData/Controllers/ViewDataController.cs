using Microsoft.AspNetCore.Mvc;

namespace ViewBag_and_ViewData.Controllers
{
    public class ViewDataController : Controller
    {
        public IActionResult Index()
        {
            int[] id = { 1, 2, 3 };

            ViewData["SampleData"] = "Visto Sample Data";
            ViewData["SampleData_Object_Class"] = new sampleData()
            {
                SampleData_value = "Visto Sample Data from Object/Class"
            };
            ViewData["SampleData_array"] = id;
            return View("ViewData");
        }
    }
}
class sampleData
{
    public string? SampleData_value { get; set; }
}