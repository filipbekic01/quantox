<?php

use PHPUnit\Util\Json;
use Quantox\Framework;
use School\Repository\StudentRepository;
use School\Service\Student\Report\StudentReportService;
use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\EventDispatcher;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

$container = new DependencyInjection\ContainerBuilder();
$container->register('request_stack', HttpFoundation\RequestStack::class);
$container->register('context', Routing\RequestContext::class);
$container->register('matcher', Routing\Matcher\UrlMatcher::class)
    ->setArguments([$routes, new Reference('context')]);

// We can create custom controller and argument resolver, i'll keep original for now.
$container->register('controller_resolver', HttpKernel\Controller\ControllerResolver::class);
$container->register('argument_resolver', HttpKernel\Controller\ArgumentResolver::class);

// Enable router using matcher and request_stack services.
$container->register('listener.router', HttpKernel\EventListener\RouterListener::class)
    ->setArguments([new Reference('matcher'), new Reference('request_stack')]);

$container->register('dispatcher', EventDispatcher\EventDispatcher::class)
    ->addMethodCall('addSubscriber', [new Reference('listener.router')]);

// Serializers
$container->register('json_encoder', JsonEncoder::class);
$container->register('xml_serializer', Serializer::class)
    ->setArguments([[new ObjectNormalizer()], [new XmlEncoder()]]);

// School application
$container->register('student_repository', StudentRepository::class);
$container->register('student_report_service', StudentReportService::class);

// Finally register framework with all required dependencies.
$container->register('framework', Framework::class)
    ->setArguments([
        new Reference('dispatcher'),
        new Reference('controller_resolver'),
        new Reference('request_stack'),
        new Reference('argument_resolver'),
    ]);

return $container;
