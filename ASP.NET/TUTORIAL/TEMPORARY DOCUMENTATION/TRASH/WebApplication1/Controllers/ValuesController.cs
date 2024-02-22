using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using JWT;
using JWT.Algorithms;
using JWT.Builder;
using Newtonsoft.Json;

namespace WebApplication1.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ValuesController : Controller
    {
        [HttpGet]
        public IActionResult test()
        {
            var _public_key = System.Security.Cryptography.RSA.Create();
            _public_key.ImportFromPem("-----BEGIN PUBLIC KEY-----\r\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkvt5ro7f3ksX7FFKZEU2\r\nIvaJJEogUqFHOmzHLQLThPoJbLVRl22O1+IBq22+tV/QdxfO0Mbi4zh5xp9cTJYP\r\nYQFxB+mBsmTiljxAaDnUcY78WNmRfx7zXArOLbtbZoFYCprhMdZaTyvVVZtzpvsX\r\nflSmF8rd+ZeTfThpwnA6qqXPMCetLL9WHNuEi/vvz4ofCWw2HnzwdWKSwzPnKRus\r\ntETNHlxXt8FrE77X4vg157/9yzsUGpDLNx+fvLvp/P/Pl7BHClQvmO1jUIKld5qs\r\nKQWBz5IpZFEkEB/wN3z0G93J6t3c1LdMWEEIfj5nCw5XKjK0ztDS8oOLv0Y8Nnfx\r\nUQIDAQAB\r\n-----END PUBLIC KEY-----\r\n");

            var _private_key = System.Security.Cryptography.RSA.Create();
            _private_key.ImportFromPem("-----BEGIN PRIVATE KEY-----\r\nMIIEugIBADANBgkqhkiG9w0BAQEFAASCBKQwggSgAgEAAoIBAQCS+3mujt/eSxfs\r\nUUpkRTYi9okkSiBSoUc6bMctAtOE+glstVGXbY7X4gGrbb61X9B3F87QxuLjOHnG\r\nn1xMlg9hAXEH6YGyZOKWPEBoOdRxjvxY2ZF/HvNcCs4tu1tmgVgKmuEx1lpPK9VV\r\nm3Om+xd+VKYXyt35l5N9OGnCcDqqpc8wJ60sv1Yc24SL++/Pih8JbDYefPB1YpLD\r\nM+cpG6y0RM0eXFe3wWsTvtfi+DXnv/3LOxQakMs3H5+8u+n8/8+XsEcKVC+Y7WNQ\r\ngqV3mqwpBYHPkilkUSQQH/A3fPQb3cnq3dzUt0xYQQh+PmcLDlcqMrTO0NLyg4u/\r\nRjw2d/FRAgMBAAECgf8DxI6J+v+iIyqp1CukBmIs40UAuSW6+Idq5/7zGG9zqTU0\r\npDFDQHu47QI98sJAxAQECYgzseV/DaORg+RJ0k7ynabYHRRGDnAAiercwR7BCnlN\r\njcY9C/4RDfXbFkJxjj9DhlTfgi8ueGEvoJyGW0lu45yeX4TxMQGG5DtR0K6wUSXa\r\nFa5Dr6MuFznmMVYeYa+Vo/9wAOjFqeX00NZnzi+xrENrAYRRvOOrg92Kvg1VNtdc\r\nrgKrAsod/Rb/Ah36/XZ8N/Kp4jWgHOuF4axkilWZ7uquDq1i1l0l/bdGHGrWbyu8\r\nfSH8QH07SMGWcO/qyFFSqJTLgNltFnQR8hJLMSECgYEAyroWF1jEKmLqaeved1EE\r\nOWM+Si3e/GNmIWWAKKAOCNwBPalqoYqjaXVi43O34vI3KhdFHV+pjAovS+eeXgHH\r\nKktdr86MiTkLeT7cwVBxe8X4V2q5evJiI2qVLvGF972DBlE6CKWpah0jDValLPa4\r\nB4WPmYDdWIm4jylvG4VM5HECgYEAuZtSJD+TuXtnWmjD0r8pjzMLA7YMxL6vF1o6\r\nkVUnUPiTPeRYNuY6cH2EBbagngrXXiNLZYH+2Kgu9VdiRbemIpqUlvRVIl0Odw0y\r\n9EXUv5WQHqogFJ0/djsMZArjViTA1VQFlc0nQfXwIklY3hWFOnc+Ak0XTGZfiLcJ\r\nroTCyuECgYAWxq9ishtf87sIaXKWDykdVXQTG3I5AuXfjKrIZasN/cG57sXHHm9b\r\nks+oZEDdo37lILYoJa5DyIUlzwDw6Nw6eTsuXFNXu2v5lEFzCpmlYUmUcK4kDQVP\r\nm1Llckct3UHSPN/7Rrlw7ZMZlYl7MsDcP3oxsdOsddShaPNNsT1BUQKBgEl+3ozp\r\n+/YDjo53U6t89Nj2blMe4Hl7xFtr6CsqW/ItLCji5ad/jP6ERSX6Binuww9MzIs6\r\naY6jMk0GOCzBJvEm4tXPlHKSBKtRt66QhEkE0VfDKAbhqYKIqURoJ1MyJIWUys1h\r\nujzdRSRehOkT/niDRTOmESa4lvXM/PF1MqkhAoGAUAFtZK8nF93rDH8F/m3wfGqt\r\nE1zuqcB7dmqjPd9LaTUgJ5r+ovmBJCoQkgzhj+1seXvp7xTxqAgmrtY1wrvyEwZe\r\ngQtBtEsDK+xfaadmXd8rwK/SeHcgBOK3qyZcXfObQ737dTIawV7yxVQaYVRAqwyC\r\neClQMaGPYrVqQYRLXk0=\r\n-----END PRIVATE KEY-----\r\n");
            var token = JwtBuilder.Create()
                      .WithAlgorithm(new RS256Algorithm(_public_key,_private_key))
                      .AddClaim("authenticate_date", DateTime.Now)
                      .AddClaim("authenticate", true)
                      .Encode();
            Console.WriteLine(token);

            var json = JwtBuilder.Create()
                     .WithAlgorithm(new RS256Algorithm(_public_key,_private_key))
                     .MustVerifySignature()
                     .Decode(token);
            var json_text =json.ToString();
            var result = JsonConvert.DeserializeObject<T>(json_text);  
            Console.WriteLine(result.authenticate_date);

            if (result.authenticate)
            {
                return Json("awd");
            }
            else
            {
                List<String> values = new List<String>();
                values.Add("a");
                values.Add("b");
                return Json(values);
            }

        }
    }
    class T
    {
        public DateTime authenticate_date { get; set; }
        public Boolean authenticate { get; set; }
    }
}
