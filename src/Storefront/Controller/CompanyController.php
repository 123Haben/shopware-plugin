<?php declare(strict_types=1);

namespace BasicPlugin\Storefront\Controller;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Shopware\Core\Framework\Uuid\Uuid;

#[Route(defaults: ['_routeScope' => ['storefront']])]
class CompanyController extends StorefrontController
{
    private $firmaRepository;
    private $contactRepository;

    public function __construct(
        EntityRepository $firmaRepository,
        EntityRepository $contactRepository
    ) {
        $this->firmaRepository = $firmaRepository;
        $this->contactRepository = $contactRepository;
    }

    #[Route(path: '/firma/create', name: 'frontend.firma.create', methods: ['GET', 'POST'])]


    public function createFirma(Request $request, SalesChannelContext $context): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();

            $newFirma = [
                'id' => Uuid::randomHex(),
                'name' => $data['name'],
                'number' => $data['number'],
                'email' => $data['email'],
                'city' => $data['city'],
                'country' => $data['country'],
                'active' => true,
            ];

            $this->firmaRepository->create([$newFirma], $context->getContext());

            return $this->redirectToRoute('frontend.firma.list');
        } else {
            return $this->render('storefront/page/firma/create.html.twig');
        }
    }



    #[Route(path: '/firma/{firmaId}/contacts', name: 'frontend.firma.contacts', methods: ['GET'])]
    public function showFirmaContacts(string $firmaId, SalesChannelContext $context): Response
    {
        $firma = $this->firmaRepository->search(new Criteria([$firmaId]), $context->getContext())->first();

        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('firmaId', $firmaId));
        $contacts = $this->contactRepository->search($criteria, $context->getContext())->getEntities();

        return $this->render('storefront/page/firma/contacts.html.twig', [
            'firma' => $firma,
            'contacts' => $contacts,
        ]);
    }

    #[Route(path: '/contact/create', name: 'frontend.contact.create', methods: ['GET', 'POST'])]
    public function createContact(Request $request, SalesChannelContext $context): Response
    {
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $nachname = $request->request->get('nachname');
            $email = $request->request->get('email');
            $age = $request->request->get('age');
            $telefon = $request->request->get('telefon');
            $street = $request->request->get('street');
            $number = $request->request->get('number');
            $postcode = $request->request->get('postcode');
            $city = $request->request->get('city');
            $country = $request->request->get('country');

            $firmaId = $request->request->get('selected_firma_id');

            $newContact = [
                'id' => Uuid::randomHex(),
                'name' => $name,
                'nachname' => $nachname,
                'email' => $email,
                'age' => $age,
                'telefon' => $telefon,
                'street' => $street,
                'number' => $number,
                'postcode' => $postcode,
                'city' => $city,
                'country' => $country,
                'firma' => [
                    'id' => $firmaId,
                ],
                'active' => true,
            ];



            $this->contactRepository->create([$newContact], $context->getContext());

            return $this->redirectToRoute('frontend.contact.list');
        } else {

            $firmen = $this->firmaRepository->search(new Criteria(), $context->getContext())->getEntities();

            return $this->render('storefront/page/contact/form.html.twig', [
                'firmen' => $firmen,
            ]);
        }
    }


}
