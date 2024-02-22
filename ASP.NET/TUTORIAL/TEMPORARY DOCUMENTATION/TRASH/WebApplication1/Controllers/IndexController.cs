using Microsoft.AspNetCore.Mvc;
using MySqlConnector;

namespace WebApplication1.Controllers
{
    public class IndexController : Controller
    {
        public IActionResult Index()
        {
            
            /*MySqlConnection connection = new MySqlConnection();
            MySqlDataReader reader;
            MySqlCommand command;
            try
            {
                connection.ConnectionString = "Server=localhost;Database=creds;Uid=root;Pwd='';";
                connection.Open();
                command = connection.CreateCommand();
                command.CommandText = "SELECT * FROM `creds_info`";
                reader = command.ExecuteReader();
                if (reader.Read())
                {
                    Console.WriteLine("awd");
                }
                else
                {
                    Console.WriteLine("bwd");
                }
            }
            catch (Exception)
            {
                Console.WriteLine("bwd");
            }
            List<string> list = new List<string>();
            list.Add("a");
            list.Add("b");*/
            return View() ;
        }
    }
}
