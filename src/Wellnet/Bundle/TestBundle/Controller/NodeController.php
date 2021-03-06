<?php

namespace Wellnet\Bundle\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NodeController extends BaseClientController {

  /**
   * @param Request $request
   *
   * @return Response
   */
  public function createAction(Request $request) {
    return $this->redirect('wellnet_test_homepage');
  }

  /**
   * @param Request $request
   * @param $nid
   *
   * @return Response
   */
  public function updateAction(Request $request, $nid) {
    return $this->redirect('wellnet_test_homepage');
  }

  /**
   * @param Request $request
   * @param $type
   *
   * @return Response
   */
  public function indexAction(Request $request, $type) {
    $client = $this->getOauthClient($request);

    $request = $client->get("{$this->getBaseUrl()}/node");
    $query = $request->getQuery();
    $query->set('parameters', array('type' => $type));
    $data = $request->send();

    return $this->render('WellnetTestBundle:Default:response.html.twig', array('data' => $data));
  }

  /**
   * @param Request $request
   *
   * @return Response
   */
  public function allNodesAction(Request $request) {
    $client = $this->getOauthClient($request);

    $request = $client->get("{$this->getBaseUrl()}/node");
    $data = $request->send();

    return $this->render('WellnetTestBundle:Default:response.html.twig', array('data' => $data));
  }

  /**
   * @param Request $request
   * @param $nid
   *
   * @return Response
   */
  public function getAction(Request $request, $nid) {
    $client = $this->getOauthClient($request);

    $request = $client->get("{$this->getBaseUrl()}/node/{$nid}");
    $data = $request->send();

    return $this->render('WellnetTestBundle:Default:response.html.twig', array('data' => $data));
  }

  /**
   * @param Request $request
   * @param $nid
   *
   * @return Response
   */
  public function deleteAction(Request $request, $nid) {
    $client = $this->getOauthClient($request);

    $request = $client->delete("{$this->getBaseUrl()}/node/{$nid}");
    $data = $request->send();

    return $this->render('WellnetTestBundle:Default:response.html.twig', array('data' => $data));
  }
}
