using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace EECS647Project.Pages
{
    public class FindRecipeModel : PageModel
    {
        private readonly ILogger<FindRecipeModel> _logger;

        public FindRecipeModel(ILogger<FindRecipeModel> logger)
        {
            _logger = logger;
        }

        public void OnGet()
        {
        }
    }
}