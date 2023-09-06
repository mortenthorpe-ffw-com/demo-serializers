<?php

namespace App\Controller;

use App\Factory\SerializeTestObjFactory;
use App\Resources\Entity\SerializeTestObj;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class CoreSerializerController extends AbstractController
{
    #[Route('/core/serializer', name: 'app_core_serializer', methods: ["GET"])]
    public function index(Request $request, SerializeTestObjFactory $testObjFactory, SerializerInterface $serializer): Response
    {
        $objToTransform = $testObjFactory->create();
        $serialized = $serializer->serialize($objToTransform, JsonEncoder::FORMAT);
        $deserialized = $serializer->deserialize($serialized, $objToTransform::class, JsonEncoder::FORMAT);

        return $this->render('core_serializer/index.html.twig', [
            'controller_name' => 'CoreSerializerController',
            'data' => $objToTransform,
            'data_assoc_serialized' => $serialized,
            'data_assoc_deserialized' => $deserialized,
        ]);
    }

    #[Route(
        '/core/serializer',
        name: 'app_core_serializer_create',
        methods: ["POST", "OPTIONS"]
    )]
    public function create(
        Request                 $request,
        SerializeTestObjFactory $testObjFactory,
        SerializerInterface     $serializer
    ): JsonResponse
    {
        $useSerializer = false;
        $postedData = [];
        $postedDataRaw = $request->getContent();

        /**
         * @var SerializeTestObj $objToTransform
         */
        $objToTransform = $testObjFactory->create();

        if (!$useSerializer) {
            $postedData = (json_decode($postedDataRaw, true) !== false) ? json_decode($postedDataRaw, true) : null;
            if(!empty($postedData)) {
                // Without a Serializer to decode/deserialize, we need to somehow set the values from the postedData
                $postedDataFirstNameOrNull = ($postedData['firstName']) ?? ($postedData['firstName']) ?? $objToTransform->getFirstName();
                if ($postedDataFirstNameOrNull) {
                    $objToTransform->setFirstName($postedDataFirstNameOrNull . ' -- no serializer!');
                }
                return new JsonResponse($serializer->serialize($objToTransform, JsonEncoder::FORMAT), Response::HTTP_OK, [], true);
            } else {
                throw new \Exception('Wrong input format!');
            }
        } else {
            // With a serializer we can....
            // @see https://symfony.com/doc/current/components/serializer.html#deserializing-in-an-existing-object
            $serializer->deserialize($postedDataRaw, $objToTransform::class, JsonEncoder::FORMAT, [AbstractNormalizer::OBJECT_TO_POPULATE => $objToTransform]);
            return new JsonResponse($serializer->serialize($objToTransform, JsonEncoder::FORMAT), Response::HTTP_OK, [], true);
        }
    }
}