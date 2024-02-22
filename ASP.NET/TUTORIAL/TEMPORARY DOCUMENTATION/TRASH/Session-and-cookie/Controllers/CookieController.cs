using Microsoft.AspNetCore.Mvc;

namespace Session_and_cookie.Controllers
{
    public class CookieController : Controller
    {
        public IActionResult Index()
        {
            //String.IsNullOrEmpty(HttpContext.Request.Cookies["<Name of Cookie>"]) -> check if <Name of cookie> have Value
            //HttpContext.Request.Cookies["<Name of Cookie>"] -> get the value of  <Name of cookie>
            //HttpContext.Response.Cookies.Append("<Name of Cookie>", <Value>); -> set the value of <Name of cookie>
            //HttpContext.Response.Cookies.Delete("<Name of Cookie>") -> remove the <Name of cookie>
            if (String.IsNullOrEmpty(HttpContext.Request.Cookies["CookieKeyName"]))
            {
                Cookie cookie = new Cookie();
                cookie.CookieName = "";
                ViewBag.Cookie = cookie;
            }
            else
            {
                Cookie cookie = new Cookie();
                cookie.CookieName = HttpContext.Request.Cookies["CookieKeyName"];
                ViewBag.Cookie = cookie;
            }
            return View("SetGetCookie");
        }
        [HttpPost]
        public IActionResult SetCookie()
        {
            var username = HttpContext.Request.Form["username"];
            HttpContext.Response.Cookies.Append("CookieKeyName", username);
            return RedirectToAction("Index");
        }
        [HttpPost]
        public IActionResult DeleteCookie()
        {
            HttpContext.Response.Cookies.Delete("CookieKeyName");
            return RedirectToAction("Index");
        }
    }
}
class Cookie
{
    public string? CookieName { get; set; }
}
