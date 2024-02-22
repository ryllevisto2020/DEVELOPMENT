var builder = WebApplication.CreateBuilder(args);

// Add services to the container.
builder.Services.AddRazorPages();
builder.Services.AddMemoryCache();
builder.Services.AddDistributedMemoryCache();
builder.Services.AddSession(options =>
{
    options.IdleTimeout = TimeSpan.FromSeconds(10); // Set the timeout active for session
    options.Cookie.IsEssential = true; 
    options.Cookie.HttpOnly = true;
});
builder.Services.AddMvc(options => { options.EnableEndpointRouting = false; });
var app = builder.Build();

// Configure the HTTP request pipeline.
if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Error");
    // The default HSTS value is 30 days. You may want to change this for production scenarios, see https://aka.ms/aspnetcore-hsts.
    app.UseHsts();
}

app.UseHttpsRedirection();
app.UseStaticFiles();

app.UseRouting();

app.UseAuthorization();

app.MapRazorPages();

app.UseSession();

app.UseMvc(routes =>
{
    routes.MapRoute(
        name:"Session",
        template:"Session",
        defaults: new {controller= "Session", action="Index"}
        );

    routes.MapRoute(
        name: "Session_set",
        template: "SessionSet",
        defaults: new { controller = "Session", action = "SetSession" }
        );

    routes.MapRoute(
        name: "Session_delete",
        template: "SessionDelete",
        defaults: new { controller = "Session", action = "DeleteSession" }
        );

    //Cookie Controller
    routes.MapRoute(
        name: "Cookie",
        template: "Cookie",
        defaults: new { controller = "Cookie", action = "Index" }
        );

    routes.MapRoute(
        name: "Cookie_set",
        template: "CookieSet",
        defaults: new { controller = "Cookie", action = "SetCookie" }
        );

    routes.MapRoute(
       name: "Cookie_delete",
       template: "CookienDelete",
       defaults: new { controller = "Cookie", action = "DeleteCookie" }
       );
});

app.Run();
