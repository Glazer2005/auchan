use App\Models\Category; 
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all(); 

        $query = Product::with('category');

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(9);
        $totalProducts = Product::count();
        $lastProduct = Product::latest()->first();

        return view('products.dashboard', compact('products','categories','totalProducts','lastProduct'));
    }
}
