namespace User;

final class AuthController extends \RKA\AbstractController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        // display login form
    }

    public function postLogin()
    {
        // authentication & redirect
    }

    public function logout()
    {
        // logout functionality
    }
}