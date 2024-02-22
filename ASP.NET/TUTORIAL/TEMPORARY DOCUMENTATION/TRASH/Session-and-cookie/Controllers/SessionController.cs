using Microsoft.AspNetCore.Mvc;

namespace Session_and_cookie.Controllers
{
    public class SessionController : Controller
    {
        public const string SessionKeyName = "_Name";
        public IActionResult Index()
        {
            //string.IsNullOrEmpty(HttpContext.Session.GetString(<Name of Session>) -> check if <Name of session> have Value
            //HttpContext.Session.GetString(<Name of Session>) -> get the value of <Name of session>
            //HttpContext.Session.SetString(<Name of Session>, <Value>) -> set the value of <Name of session>
            //HttpContext.Session.Remove(<Name of Sessio>) -> remove the <Name of session>
            if (string.IsNullOrEmpty(HttpContext.Session.GetString(SessionKeyName)))
            {
                Session session = new Session();
                session.SessionName = "";
                ViewBag.Session = session;
            }
            else
            {
                Session session = new Session();
                session.SessionName = HttpContext.Session.GetString(SessionKeyName);
                ViewBag.Session = session;
            }
            Console.WriteLine(HttpContext.Session.GetString(SessionKeyName));
            return View("SetGetSession");
        }
        [HttpPost]
        public IActionResult SetSession()
        {
            var username = HttpContext.Request.Form["username"];
            HttpContext.Session.SetString(SessionKeyName, username);
            return RedirectToAction("Index");   
        }
        [HttpPost]
        public IActionResult DeleteSession()
        {
            HttpContext.Session.Remove(SessionKeyName);
            return RedirectToAction("Index");
        }
    }
}
class Session
{
    public string? SessionName { get; set; }
}
