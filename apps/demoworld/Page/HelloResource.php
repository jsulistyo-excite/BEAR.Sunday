<?php
namespace demoworld\Resource\Page;

use BEAR\Resource\Resource,
    BEAR\Resource\Object as ResourceObject,
    BEAR\Resource\AbstractObject as Page,
    BEAR\Framework\Link\View\Php as PhpView;
use BEAR\Resource\Annotation\Provides;

/**
 * Hello World using resource
 */
class HelloResource extends Page
{
    use PhpView;

    /**
     * HTTP headers
     *
     * @var array
     */
    public $headers = ['Content-Type: text/html; charset=UTF-8'];

    /**
     * @var ResourceObject
     */
    protected $greeting;

    /**
     * Resource
     *
     * @var Client
     */
    protected $resource;

    /**
     * @param Resource $resource Resource Client
     *
     * @Inject
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
        $this->greeting = $resource->newInstance('app://self/greeting');
    }

    /**
     * @param string $lang laungauage
     *
     * @return ResourceObject
     */
    public function onGet($lang)
    {
        $this['greeting'] = $this->resource->get->object($this->greeting)->withQuery(['lang' => $lang])->eager->request();
        return $this;
    }

    /**
     * @Provides("lang")
     */
    public function provideLang()
    {
        return 'en';
    }
}