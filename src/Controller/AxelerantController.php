<?php
/**
 * @file
 * Contains \Drupal\axelerant_site_info\Controller\AxelerantController.
 */
namespace Drupal\axelerant_site_info\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\node\Entity\Node;

class AxelerantController {
  public function content($key = '', $nid = '') {
    // Fetch Site Api Keys
    $siteApiKey = \Drupal::state()->get('siteapikey');
    // Load Node by given nid in parameter
    $nodeAry = Node::load($nid);
    if(!empty($nodeAry)) {
      $nodeAry = $nodeAry->toArray();
      $nodeType = $nodeAry['type']['0']['target_id'];
      // Check - SiteApiKey & Node Id are Valid or Not
      if(($siteApiKey == $key) && ($nodeType == 'page')) {
        $res = ['status' => 'Success, Valid Site API Key & Appropriate node are present','data'=>['key'=>$key, 'nid'=>$nid]];
        return new JsonResponse([
          'data' => $res,
          'method' => 'GET',
        ]);
      } else {
        throw new AccessDeniedHttpException();
      }
    } else {
      throw new AccessDeniedHttpException();
    }
  }
}